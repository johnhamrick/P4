<?php

class Task extends Eloquent {

	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');

	/**
	* Task belongs to user
	* Define an inverse one-to-many relationship.
	*/
		
		public function user() {
		
		return $this->belongsTo('user');
}

	/**
	* Tasks belong to many Tags
	*/

		public function tags() {
			
		return $this->belongsToMany('Tag');
}

	/**
	* This array will compare an array of given tags with existing tags
	* and figure out which ones need to be added and which ones need to be deleted
	*/
		
		public function updateTags($new = array()) {
		// Go through new tags to see what ones need to be added
		foreach($new as $tag) {
			if(!$this->tags->contains($tag)) {
				$this->tags()->save(Tag::find($tag));
	}
}
		
		// Go through existing tags and see what ones need to be deleted
		foreach($this->tags as $tag) {
			if(!in_array($tag->pivot->tag_id,$new)) {
				$this->tags()->detach($tag->id);
		}
	}
}

	/**
	* Search among Tasks, users and tags
	* @return Collection
	*/

		public static function search($query) {
		# If there is a query, search the library with that query
			if($query) {

		# Eager load tags and user
		$Tasks = Task::with('tags','user')
		->whereHas('user', function($q) use($query) {
			$q->where('name', 'LIKE', "%$query%");
	})

		->orWhereHas('tags', function($q) use($query) {
			$q->where('name', 'LIKE', "%$query%");
	})
		->orWhere('title', 'LIKE', "%$query%")
		->orWhere('published', 'LIKE', "%$query%")
		->get();

		# Note on what `use` means above:
		# Closures may inherit variables from the parent scope.
		# Any such variables must be passed to the `use` language construct.
}

		# Otherwise, just fetch all Tasks
			else {
		# Eager load tags and user
		$Tasks = Task::with('tags','user')->get();
}

		return $Tasks;
}

	/**
	* Searches and returns any Tasks added in the last 24 hours
	*
	* @return Collection
	*/

		public static function getTasksAddedInTheLast24Hours() {
		
		# Timestamp of 24 hours ago
		$past_24_hours = strtotime('-1 day');

		# Convert to MySQL timestamp
		$past_24_hours = date('Y-m-d H:i:s', $past_24_hours);

		$Tasks = Task::where('created_at','>',$past_24_hours)->get();

		return $Tasks;
}

	/**
	*
	*
	* @return String
	*/

		public static function sendDigests($users,$Tasks) {
			
			$recipients = '';

			$data['Tasks'] = $Tasks;

			foreach($users as $user) {

			$data['user'] = $user;

	/*
	Mail::send('emails.digest', $data, function($message) {
	$recipient_email = $user->email;
	$recipient_name = $user->first_name.' '.$user->last_name;
	$subject = 'FooTasks Digest';
	$message->to($recipient_email, $recipient_name)->subject($subject);
	});
	*/

			$recipients .= $user->email.', ';
	}

			$recipients = rtrim($recipients, ',');

			return $recipients;
	}
}