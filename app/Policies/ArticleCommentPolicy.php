<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticleCommentPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function hapus(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id || $user->id === $comment->article->user_id;
    }
}
