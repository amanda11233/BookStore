<?php 
namespace App\Repo\Repository\User;

use App\Repo\Module\User;
use DB;
use App\Repo\Repository\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\userUser
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
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
     * @param userUser $userUser
     */
    public function __construct(User $User)
    {   
        $this->model = $User;
      
    }

    public function getUsers($id){
return $this->model->where('id', $id)->first();
    }
}