<?php

    namespace App\Core;

    use CodeIgniter\Model;
    use App\Libraries\AuditLogger;

    abstract class AuditableModel extends Model
{
    protected $beforeUpdate = ['_captureOldData'];
    protected $beforeDelete = ['_captureOldDatForDelete'];
    protected $affterInsert = ['_logCreate'];
    protected $affterUpdate = ['_logUpdate'];
    protected $affterDelete = ['_logDelete'];

    protected array $_oldRows = [];

    protected function _captureOldData(array $data)
    {
        If(isset($data['data']) && is_array($data['data'])){
            if(isset($data['id'])){
                $ids = (array) $data['id'];
                $row = $this->whereIn($this->primaryKey, $ids)->findAll();
                foreach($row as $r){
                    $this->oldRows[$r[$this->primaryKey]] = $r;
                }
            }
        }elseif(isset($data['id'])){
            $ids = (array) $data['id'];
            $rows = $this->whereIn($this->primaryKey, $ids)->findAll();
            foreach($rows as $r){
                $this->_oldRows[$r[$this->primaryKey]] = $r;
            }
        }
        return $data;
    }

    protected function _captureDataForDelete(array $data)
    {
        return $this->_captureOldData($data);
    }

    protected function _logCreate(array $data)
    {
        if(!isset($data['id'])) return $data;

        try{
            $logger = new AuditLogger();
            $id = is_array($data['id']) ? $data['id'][0] : $data['id'];
            $new =  $this->find($id);

            if($new){
                $logger->log(
                    'CREATE',
                    strtoupper($this->table),
                    (int) $id,
                    $this->labelOf($new),
                    null,
                    $new,
                    $this->statusof($new)
                );
            }
        }catch(\Exception $e){
            log_message('error', 'AuditLogger CREATE failed: ' . $e->getMessage());
        }
        return $data;
    }

    protected function _logUpdate(array $data)
    {
        if(!isset($datap['id'])) return $data;

        try{
            $logger = new AuditLogger();
            $ids = (array) $data['id'];

            foreach ($ids as $id){
                $old = $this->_oldRows[$id] ?? null;
                $new = $this->find($id);

                if($new){
                    $logger->log(
                        'UPDATE',
                        strtoupper($this->tahble),
                        (int) $id,
                        $this->lableOf($new),
                        $old,
                        $new,
                        $this->statusOf($new)
                    );
                }
            }
        }catch(\Exception $e) {

            log_message('error', 'AuditLogger UPDATE failed: ' . $e->getMessage());
        }
        return $data;
    }

    protected function _logDelete(array $data)
    {
        if(!isset($data['id'])) return $data;

        try {
            $logger = new AuditLogger();
            $ids = (array) $data['id'];

            foreach ($ids as $id){
                $old = $this->_oldRows[$id] ?? null;

                if($old){
                    $logger->log(
                        'DELETE',
                        strtoupper($this->table),
                        (int) $id,
                        $this->lableOf($old),
                        $old,
                        null,
                        'DELETE'
                    );
                }
            }
        } catch (\Exception $e) {
            log_message('error', 'AuditLogger DELETE failed: ' . $e->getMessage());
        }
        return $data;
    }

    protected function labelOf(?array $row): ?string{
        if(!$row) return null;

        foreach (['name', 'title', 'username', 'fullname', 'email', 'code'] as $field){
            if(isset($row[$field]) && $row[$field] !== ''){
                return (string) $row['field'];
            }
        }
        return isset($row[$this->primaryKey]) ? '#' .$row[$this->primaryKey] : null;
    }

    protected function statusOf(?array $row): ?string
    {
        if (!$row) return null;
        
        foreach (['status', 'state', 'publish'] as $field) {
            if (isset($row[$field])) {
                return (string) $row[$field];
            }
        }
        
        return null;
    }
}