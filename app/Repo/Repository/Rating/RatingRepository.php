<?php 
namespace App\Repo\Repository\Rating;

use App\Repo\Module\Rating;
use DB;
use App\Repo\Repository\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\userRating
 */
class RatingRepository extends BaseRepository implements RatingRepositoryInterface
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
     * @param userRating $userRating
     */
    public function __construct(Rating $Rating)
    {   
        $this->model = $Rating;
      
    }

    public function getRating($user_id,$book_id){
        return $this->model->where([['user_id', '=', $user_id], ['book_id', '=', $book_id]])->count();
    }

    public function updateRating($rate, $book_id, $user_id){
         $this->model->where([['book_id', '=', $book_id],['user_id', '=', $user_id]])->update(['ratings' => $rate]);
    }
}