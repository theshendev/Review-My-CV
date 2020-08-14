<?php

use App\Reviewer;
use App\User;

function relationExists(User $user,Reviewer $reviewer){

    return ($user->allowed_reviewers()->where('allowed_reviewer_id',$reviewer->id)->exists());

}
