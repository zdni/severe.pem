<?php

class Videos_model extends CI_Model {
    private $_table = 'videos';

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

    public function video( $id = NULL )
    {
        if( $id ) $this->db->where('id', $id);
        return $this->videos();
    }

    public function videos_show( $laboratory_id = NULL, $is_show = NULL )
    {
        if( $is_show ) $this->db->where('is_show', $is_show);
        return $this->videos( $laboratory_id );
    }

    public function videos( $laboratory_id = NULL, $start = NULL, $end = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        if( $laboratory_id ) $this->db->where('laboratory_id', $laboratory_id);
        if( $start && $end ) return $this->db->get( $this->_table, $end, $start );
        return $this->db->get( $this->_table );
    }
}

?>