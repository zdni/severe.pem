<?php

class Hasil_model extends CI_Model {
    private $_table = 'hasil';

    public function tambah( $data = NULL )
    {
        if ( $data ) {
            $this->db->insert( $this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return false;
    }

    public function tambah_batch( $data = NULL )
    {
        if ( $data ) {
            return $this->db->insert_batch( $this->_table, $data);
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

    public function hapus( $id = NULL, $pasien_id = NULL )
    {
        if ( $id ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->delete( $this->_table );
        }
        if ( $pasien_id ) {
            $this->db->where( $this->_table . '.pasien_id', $pasien_id );
            return $this->db->delete( $this->_table );
        }
        return false;
    }

    public function hapus_semua()
    {
        $this->db->where( $this->_table . '.id>', 0 );
        return $this->db->delete( $this->_table );
    }

    public function hasil( $id = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        $this->db->select( 'pasien.nama AS nama' );
        $this->db->join(
            'pasien',
            'pasien.id = hasil.pasien_id',
            'join'
        );
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        $this->db->order_by('ranking', 'ASC');
        return $this->db->get( $this->_table );
    }
}

?>