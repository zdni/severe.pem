<?php

class Penilaian_model extends CI_Model {
    private $_table = 'penilaian';

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

    public function ubah( $pasien_id = NULL, $kriteria_id = NULL, $data = NULL )
    {
        if ( $pasien_id && $kriteria_id && $data ) {
            $this->db->where( $this->_table . '.pasien_id', $pasien_id );
            $this->db->where( $this->_table . '.kriteria_id', $kriteria_id );
            return $this->db->update( $this->_table, $data );
        }
        return false;
    }

    public function hapus( $id = NULL )
    {
        if ( $id ) {
            $this->db->where( $this->_table . '.pasien_id', $id );
            return $this->db->delete( $this->_table );
        }
        return false;
    }

    public function penilaian( $id = NULL, $pasien_id = NULL, $start = NULL, $end = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        $this->db->select( 'pasien.nama AS pasien' );
        $this->db->select( 'kriteria.nama AS kriteria' );
        $this->db->select( 'kriteria.bobot AS bobot_kriteria' );
        $this->db->select( 'kriteria.tipe AS tipe_kriteria' );
        $this->db->select( 'subkriteria.keterangan AS keterangan' );
        $this->db->select( 'subkriteria.nilai AS subkriteria' );
        $this->db->select( 'subkriteria.bobot AS bobot_subkriteria' );
        $this->db->join(
            'pasien',
            'pasien.id = '. $this->_table .'.pasien_id',
            'join'
        );
        $this->db->join(
            'kriteria',
            'kriteria.id = '. $this->_table .'.kriteria_id',
            'join'
        );
        $this->db->join(
            'subkriteria',
            'subkriteria.id = '. $this->_table .'.subkriteria_id',
            'join'
        );
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        if( $pasien_id ) $this->db->where( $this->_table . '.pasien_id', $pasien_id);
        if( !is_null($start) && $end ) return $this->db->get( $this->_table, $end, $start );
        return $this->db->get( $this->_table );
    }

    public function penilaian_per_pasien_kriteria( $pasien_id = NULL, $kriteria_id = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        if( $pasien_id ) $this->db->where( $this->_table . '.pasien_id', $pasien_id);
        if( $kriteria_id ) $this->db->where( $this->_table . '.kriteria_id', $kriteria_id);
        return $this->db->get( $this->_table );
    }
}

?>