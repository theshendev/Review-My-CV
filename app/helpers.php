<?php

use App\Reviewer;
use App\User;

function relationExists(User $user,Reviewer $reviewer){

    return ($user->allowed_reviewers()->where('allowed_reviewer_id',$reviewer->id)->exists());

}
function isRelationExpired(User $user,Reviewer $reviewer){
    return !($user->allowed_reviewers()->where('allowed_reviewer_id',$reviewer->id)->where('expires_at','>',now())->exists());

    }
function anyRelationExists(User $user){
    return ($user->allowed_reviewers()->where('expires_at','>',now())->exists());

}
function commentsToCheck(User $user){
    return ($user->comments()->where('is_checked','==','0')->exists());
}
function reviewerCommented(User $user, Reviewer $reviewer){
    return (!$user->comments->where('reviewer_id','==',$reviewer->id)->isEmpty());
}
function getComment(User $user, Reviewer $reviewer){
    return $user->comments->where('reviewer_id','==',$reviewer->id)->first();
}


function getGuard(){
    $guard = 'web';
    if (auth('reviewer')->check()){
        $guard = 'reviewer';
    }
    return $guard;
}