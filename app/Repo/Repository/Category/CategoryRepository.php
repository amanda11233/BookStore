<?php 
namespace App\Repo\Repository\Category;

use App\Repo\Module\Category;
use DB;
use App\Repo\Repository\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\userCategory
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
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
     * @param userCategory $userCategory
     */
    public function __construct(Category $Category)
    {   
        $this->model = $Category;
      
    }

    public function getOne($category){
return $this->model->where('category_name', $category)->first();
    }
}