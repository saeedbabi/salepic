<?php

namespace App\Services\Uploader;

use App\Models\FileTags;
use App\Models\Tag;

class FileTag
{
    private $model;
    private $tagmodel;

    public function __construct($file_id, $file_tags)
    {
        $this->model = new FileTags();
        $this->tagmodel = new Tag();
        $this->file_id = $file_id;
        $this->file_tags = $file_tags;
    }


    public function getTags()
    {
        return array_column($this->tagmodel->read(['id', 'slug'], array()), 'id', 'slug');
    }

    public function tagExist($value, $tags)
    {
        if (in_array($value, array_keys($tags))) {
            return $tags[$value];
        }
    }

    public function createTag($value)
    {
        $this->tagmodel->create(array('title' => $value, 'slug' => $value));
    }

    public function createFileTags($tag_id)
    {
        $this->model->create(array('file_id' => $this->file_id, 'tag_id' => $tag_id));
    }

    public function tagNotExist($value, $tags)
    {
        if (!in_array($value, array_keys($tags))) {
            return $this->createTag($value);
        }
    }

    public function createFileTag($file_tags, $tags)
    {
        foreach ($file_tags as $value) {
            if ($this->tagExist($value, $tags)) {
                $tag_id = $this->tagExist($value, $tags);
                $this->createFileTags($tag_id);
            }
            $tag_id = $this->tagNotExist($value, $tags);
            $this->createFileTags($tag_id);
        }
    }
}
