<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Minuman extends CI_Controller{
    function __construct(){     
        parent::__construct();     
    }
    function index(){      
        $result=$this->db->get('tb_penjualan')->result();      
        echo json_encode($result);  
    }
    function save(){
        $data=array(         
            'nama'=>$_POST['nama'],
            'minuman'=>$_POST['minuman'],         
            'jenis'=>$_POST['jenis'],         
            'jumlah'=>$_POST['jumlah'],
            'harga'=>$_POST['harga'],         
            'tanggal'=>$_POST['tanggal']      
         );       
         $this->db->insert('tb_penjualan',$data);  
    }
    function save_update(){   
        $update=array(     
            'nama'=>$_POST['nama'],
            'minuman'=>$_POST['minuman'],         
            'jenis'=>$_POST['jenis'],         
            'jumlah'=>$_POST['jumlah'],
            'harga'=>$_POST['harga'],         
            'tanggal'=>$_POST['tanggal']      
        );   
        $this->db->where('id',$_POST['id'])->update('tb_penjualan',$update); 
    }  
    function delete($id){  
        $this->db->where('id',$id)->delete('tb_penjualan'); 
    } 
    
}