<?php

namespace App\Services;

use App\Repositories\Post\PostRepositoryInterface;

class PostService
{
    public function __construct(
        protected PostRepositoryInterface $PostRepository
    ) {
    }

  

    public function update($data, $Post)
    {
        return $this->PostRepository->update($data, $Post);
    }

    public function delete($Post)
    {
        return $this->PostRepository->destroy($Post);
    }

  
   
}