<?php

class Moduls_model extends CI_Model {
    private $_table = 'moduls';

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

    public function modul( $id = NULL )
    {
        if( $id ) $this->db->where('id', $id);
        return $this->moduls();
    }

    public function moduls_show( $laboratory_id = NULL, $is_show = NULL )
    {
        if( !is_null($is_show) ) $this->db->where('is_show', $is_show);
        return $this->moduls( $laboratory_id );
    }

    public function moduls( $laboratory_id = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        if( $laboratory_id ) $this->db->where('laboratory_id', $laboratory_id);
        return $this->db->get( $this->_table );
    }
}

?>