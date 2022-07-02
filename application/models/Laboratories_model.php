<?php

class Laboratories_model extends CI_Model {
    private $_table = 'laboratories';

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
            // moduls
            $this->db->where(  'moduls.laboratory_id', $id );
            $this->db->delete( 'moduls' );
            // questionnaires
            $this->db->where(  'questionnaires.laboratory_id', $id );
            $this->db->delete( 'questionnaires' );
            // users
            $this->db->where(  'users.laboratory_id', $id );
            $this->db->delete( 'users' );
            // videos
            $this->db->where(  'videos.laboratory_id', $id );
            $this->db->delete( 'videos' );

            $this->db->where( $this->_table . '.id', $id );
            return $this->db->delete( $this->_table );
        }
        return false;
    }

    public function laboratory( $id = NULL )
    {
        if( $id ) $this->db->where('id', $id);
        return $this->laboratories();
    }

    public function laboratories( )
    {
        $this->db->select( $this->_table . '.*' );
        return $this->db->get( $this->_table );
    }
}

?>