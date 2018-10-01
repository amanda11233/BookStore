<?php 
namespace App\Repo\Repository\Author;

use App\Repo\Module\Author;
use DB;
use App\Repo\Repository\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\userAuthor
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{

    /**
     * The Guard instance
     *
     * @var Guard
     */
    protected $auth;

    protected $model;
    /**
     * @param Guard  $auth
     * @param userAuthor $userAuthor
     */
    public function __construct(Author $Author)
    {   
        $this->model = $Author;
      
    }
}