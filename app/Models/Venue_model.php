<?php namespace App\Models;

use CodeIgniter\Model;

class Venue_model extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staff_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'name',
        'email',
        'password',
        'access_level',
        'role',
        'phone',
        'venue_id'
    ];


    public function get_staff()
    {
        return $this->orderBy('staff_id', 'ASC')
            ->findAll();
    }

    public function get_staff_member($id = false)
    {
        if ($id === false)
        {
            return null;
        }
        else
        {
            return $this->find($id);
        }
    }

    public function login($email, $password)
    {
        $user = $this->where('email', $email)
            ->first();

        if ($user != null && password_verify($password, $user['password']))
        {
            return $user;
        }
        else
        {
            return null;
        }
    }



    public function get_rooms()
    {
        $query = $this->query("SELECT * FROM room ORDER BY room_id ASC;");
        return $query->getResultArray();
    }

    public function get_room($id = false)
    {
        if ($id === false)
        {
            return null;
        }
        else
        {
            $query = $this->query("SELECT * FROM room WHERE room_id =".$this->escape($id));
            return $query->getRowArray();
        }
    }

    public function save_room($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('room');
        return $builder->set($data)
            ->insert();
    }

    public function update_room($id, $data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('room');
        return $builder->where('room_id', $id)
            ->set($data)
            ->update();
    }



    public function get_venue($id = false)
    {
        if ($id === false)
        {
            return null;
        }
        else
        {
            $query = $this->query("SELECT * FROM venue WHERE venue_id =".$this->escape($id));
            return $query->getRowArray();
        }
    }

    public function update_venue($id, $data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('venue');
        return $builder->where('venue_id', $id)
            ->set($data)
            ->update();
    }


}