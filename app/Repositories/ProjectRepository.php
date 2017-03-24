<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    /**
     * @var mixed
     */
    protected $model;

    /**
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    /**
     * @return mixed
     */
    public function getAllProjects()
    {
        return $this->model->get(['name', 'description']);
    }

    /**
     * @return mixed
     */
    public function getLatestThreeProject()
    {
        return $this->model->orderBy('created_at', 'desc')->take(3)->get();
    }

    public function getIdFromSlug($slug)
    {
        return $this->model->where('slug', $slug)->first()->id;
    }
}