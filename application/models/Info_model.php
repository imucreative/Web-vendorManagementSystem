<?php
    class Info_model extends Ci_Model{
        
        public $table	= 'dtbinfo';

        public function getInfo(){
            $this->db->from($this->table);
            $query = $this->db->get();
            return $query;
        }

        function updateInfo(){
            $data = array(
                'name'          => strtoupper($this->input->post('name', TRUE)),
                'alias'         => strtoupper($this->input->post('alias', TRUE)),
                'address'		=> strtoupper($this->input->post('address', TRUE)),
                'telp'			=> strtoupper($this->input->post('telp', TRUE)),
                'fax'			=> strtoupper($this->input->post('fax', TRUE)),
                'email'			=> $this->input->post('email', TRUE)
                //'logo'			=> $image
                //'logo_full'		=> $logo_full
            );
            $id = $this->input->post('infoId');
            $this->db->where('infoId', $id);
            $this->db->update($this->table, $data);
        }

    }