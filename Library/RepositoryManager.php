<?php
namespace Library;

use Library\DbConnectionAwareTrait;
class RepositoryManager
{
    // use DbConnectionAwareTrait;
    
    const REPO_DIR_NAME = 'Repository';

    use DbConnetionAwareTrait;
    
    private $repositories = array();

    private function setRepository($entityName, $repo)
    {
        $this->repositories[$entityName] = $repo;
    }
    public function has($entityName)
    {
        return isset($this->repositories[$entityName]);
    }

    
    public function getRepository($entityName)
    {
        if($this->has($entityName)){
            return $this->repositories[$entityName];
        }
        $repoPath = MODEL_DIR . "{$entityName}Repository.php";
        if(!file_exists($repoPath)){
            throw new \Exception("{$entityName}Repository file not found");

        }
        $class = '\\Model\\' . "{$entityName}Repository";
        $repo = new $class();
        $repo->setDbConnection($this->dbConnection);
        // $repo->setRepository($entityName, $repo);
        
        return $repo;
    }
        public function redirect($to)
    {
        header('Location: ' . $to);
        die;
    }
}