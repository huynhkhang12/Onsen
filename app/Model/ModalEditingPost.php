<?php namespace App\Model;

use Baum\Extensions\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModalEditingPost extends Post
{
    protected $table = "posts";

}
