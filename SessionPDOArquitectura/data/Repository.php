<?php

declare(strict_types=1);

namespace app\data;


use app\interfaces\RepositoryInterface;

class Repository implements RepositoryInterface

{
    private string $fileData;
    private array $db;

    public function __construct()
    {
        $this->fileData = __DIR__ . '/data.json'; //direccion del json
        $json = file_get_contents($this->fileData); //lee el contenido y lo regresa en texto
        $this->db = json_decode($json, true);
    }
    public function get(): array
    {
        return $this->db;
    }

    public function create($data)
    {
        if (count($this->db) === 0) {
            $data['id'] = 1;
        } else {
            $lastElement = $this->db[count($this->db) - 1];
            $data['id'] = ((int)$lastElement["id"] + 1);
        }

        $this->db[] = $data;
        file_put_contents($this->fileData, json_encode($this->db));
    }

    public function update($data)
    {
        foreach ($this->db as $key => $value) {
            if ($value['id'] == $data['id']) {
                $this->db[$key] = $data;
                file_put_contents($this->fileData, json_encode($this->db));
            }
        }
    }
    public function delete(int $id)
    {
        foreach ($this->db as $key => $value) {
            if ($value['id'] == $id) {
                unset($this->db[$key]);
                $this->db=array_values($this->db);
                file_put_contents($this->fileData, json_encode($this->db));
            }
        }
    }
    public function exists(int $id): bool
    {
        foreach ($this->db as $value) {
            if ($value["id"] === $id) {
                return true;
            }
        }
        return false;
    }
}
