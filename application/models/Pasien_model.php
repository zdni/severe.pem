<?php

class Pasien_model extends CI_Model {
    private $_table = 'pasien';

    public function tambah( $data = NULL )
    {
        if ( $data ) {
            $this->db->insert( $this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return false;
    }

    public function ubah( $id = NULL, $data = NULL )
    {
        if ( $id && $data ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->update( $this->_table, $data );
        }
        return false;
    }

    public function hapus( $id = NULL )
    {
        if ( $id ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->delete( $this->_table );
        }
        return false;
    }

    public function pasien( $id = NULL, $start = NULL, $end = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        if( !is_null($start) && $end ) return $this->db->get( $this->_table, $end, $start );
        return $this->db->get( $this->_table );
    }

    public function pasien_berdasarkan_nama( $nama = NULL )
    {
        $this->db->select( $this->_table . '.id' );
        if( $nama ) $this->db->where( $this->_table . '.nama', $nama);
        return $this->db->get( $this->_table );
    }

    public function pasien_berdasarkan_user_id( $user_id = NULL )
    {
        $this->db->select( $this->_table . '.id' );
        if( $user_id ) $this->db->where( $this->_table . '.user_id', $user_id);
        return $this->db->get( $this->_table );
    }
}

?>