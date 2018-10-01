<?php 
namespace App\Repo\Repository\Admin;

use App\Repo\Module\Admin;
use DB;
use App\Repo\Repository\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\userAdmin
 */
class AdminRepository extends BaseRepository implements AdminRepositoryInterface
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
     * @param userAdmin $userAdmin
     */
    public function __construct(Admin $Admin)
    {   
        $this->model = $Admin;
      
    }
}