<?php

namespace App\Services;

use App\Repositories\Genre\GenreRepositoryInterface;

class GenreService
{
    public function __construct(
        protected GenreRepositoryInterface $GenreRepository
    ) {
    }

    public function create($data)
    {
        return $this->GenreRepository->insert($data);
    }

    public function update($data, $genre)
    {
        return $this->GenreRepository->update($data, $genre);
    }

    public function delete($genre)
    {
        return $this->GenreRepository->destroy($genre);
    }

    public function all()
    {
        return $this->GenreRepository->all();
    }
    
   
}