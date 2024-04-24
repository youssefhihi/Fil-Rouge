<?php

namespace App\Services;

use App\Repositories\Comment\CommentRepositoryInterface;

class CommentService
{
    public function __construct(
        protected CommentRepositoryInterface $CommentRepository
    ) {
    }

    public function create($data)
    {
        return $this->CommentRepository->insert($data);
    }

    public function update($data, $Comment)
    {
        return $this->CommentRepository->update($data, $Comment);
    }

    public function delete($Comment)
    {
        return $this->CommentRepository->destroy($Comment);
    }

    public function get($post)
    {
        return $this->CommentRepository->get($post);
    }
    
   
}