<?php

class Facilities_model extends CI_Model {
    private $_table = 'facilities';

    public function create( $data = NULL )
    {
        if ( $data ) {
            $this->db->insert( $this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return false;
    }

    public function update( $id = NULL, $data = NULL )
    {
        if ( $id && $data ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->update( $this->_table, $data );
        }
        return false;
    }

    public function delete( $id = NULL )
    {
        if ( $id ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->delete( $this->_table );
        }
        return false;
    }

    public function facility( $id = NULL )
    {
        if( $id ) $this->db->where('id', $id);
        return $this->facilities();
    }

    public function facilities( )
    {
        $this->db->select( $this->_table . '.*' );
        return $this->db->get( $this->_table );
    }
}

?>