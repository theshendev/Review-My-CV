<?php

use App\Reviewer;
use App\User;

function relationExists(User $user,Reviewer $reviewer){

    return ($user->allowed_reviewers()->where('allowed_reviewer_id',$reviewer->id)->exists());

}

function commentsToCheck(User $user){
    return ($user->comments()->where('is_checked','==','0')->exists());
}