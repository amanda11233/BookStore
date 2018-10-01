<?php 
namespace App\Repo\Repository\Language;

use App\Repo\Module\Language;
use DB;
use App\Repo\Repository\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Agentcis\Repositories\userLanguage
 */
class LanguageRepository extends BaseRepository implements LanguageRepositoryInterface
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
     * @param userLanguage $userLanguage
     */
    public function __construct(Language $Language)
    {   
        $this->model = $Language;
      
    }
}