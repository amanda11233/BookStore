<?php namespace App\Repo\Repository;

/**
 * Contain common methods implemented by all repositories
 * Interface RepositoryInterface
 * @package App\Agentcis\Repositories
 */
interface RepositoryInterface
{

    /**
     * Get all entities
     * @return mixed
     */
    public function index();

    /**
     * Create a entity
     * @param $details
     * @return mixed
     */
    public function create($details);

    /**
     * Find an entity with given id
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Update an entity with given id
     * @param $id
     * @param $details
     * @return mixed
     */
    public function update($id, $details);

    /**
     * Delete an entity
     * @param $id
     * @return mixed
     */
    public function delete($id);

}
