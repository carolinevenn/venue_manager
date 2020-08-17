<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Class Venue_model
 * @package App\Models
 */
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


    /**
     * Returns all Staff records, ordered by staff_id
     * @return array Staff records
     */
    public function get_staff()
    {
        return $this->orderBy('staff_id', 'ASC')
            ->findAll();
    }

    /**
     * Returns a single Staff record
     * @param int $id The staff ID
     * @return array|null Staff record
     */
    public function get_staff_member($id)
    {
        return $this->find($id);
    }

    /**
     * Returns a single Staff record,
     * only if both the email and password parameters match the record
     * @param string $email The email address to be checked
     * @param string $password The password to be checked
     * @return array|null Staff record
     */
    public function login($email, $password)
    {
        // Find the Staff record containing the given email address
        $user = $this->where('email', $email)
            ->first();

        // If a Staff record has been found,
        // and the given password matches the same record
        if ($user != null && password_verify($password, $user['password']))
        {
            // Return the Staff record
            return $user;
        }
        // If the email address or password fail to match a single record
        else
        {
            return null;
        }
    }



    /**
     * Returns all Room records, ordered by room_id
     * @return array Room records
     */
    public function get_rooms()
    {
        $query = $this->query("SELECT * FROM room ORDER BY room_id ASC;");
        return $query->getResultArray();
    }

    /**
     * Returns a single Room record
     * @param int $id The room ID
     * @return array|null Room record
     */
    public function get_room($id)
    {
        $query = $this->query("SELECT * FROM room WHERE room_id =".$this->escape($id));
        return $query->getRowArray();
    }

    /**
     * Creates a new Room record
     * @param array $data The new room data
     * @return bool TRUE on success, FALSE on failure
     */
    public function save_room($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('room');
        return $builder->set($data)
            ->insert();
    }

    /**
     * Updates an existing Room record
     * @param int $id The room ID
     * @param array $data The replacement room data
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_room($id, $data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('room');
        return $builder->where('room_id', $id)
            ->set($data)
            ->update();
    }



    /**
     * Returns a single Venue record
     * @param int $id The venue ID
     * @return array|null Venue record
     */
    public function get_venue($id)
    {
        $query = $this->query("SELECT * FROM venue WHERE venue_id =".$this->escape($id));
        return $query->getRowArray();
    }

    /**
     * Updates a single Venue record
     * @param int $id The venue ID
     * @param array $data The replacement venue data
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_venue($id, $data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('venue');
        return $builder->where('venue_id', $id)
            ->set($data)
            ->update();
    }

}
