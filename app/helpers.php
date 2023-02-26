<?php

function payment_status($status)
{
    $status = strtolower($status);
   if($status == 'down_payment')
   {
        return '<span class="badge bg-warning">Down Payment</span>';
   }elseif($status == 'paid')
   {
        return '<span class="badge bg-success">Paid</span>';
   }elseif($status == 'unpaid')
   {
        return '<span class="badge bg-danger">Unpaid</span>';
   }
   elseif($status == 'pending')
   {
        return '<span class="badge bg-warning">Pending</span>';
   }
   else{
        return '<span class="badge bg-danger">Rejected</span>';
   }
}

function order_status($status)
{
    

    $status = strtolower($status);
     if($status == 'pending')
     {
          return '<span class="badge bg-warning">Pending</span>';
     }elseif($status == 'distribute')
     {
          return '<span class="badge bg-primary">Di distribusikan</span>';
     }elseif($status == 'production')
     {
          return '<span class="badge bg-info">Di produksi</span>';
     }elseif($status == 'on_hold')
     {
          return '<span class="badge bg-warning">Kendala</span>';
     }elseif($status == 'shipping')
     {
          return '<span class="badge bg-success">Dikirim</span>';
     }elseif($status == 'done')
     {
          return '<span class="badge bg-success">Selesai</span>';
     }elseif($status == 'production_done')
     {
          return '<span class="badge bg-success">Produksi Selesai</span>';
     }
     else{
          return '<span class="badge bg-danger">Rejected</span>';
     }
}

function actionBtn($route,$id, $action = ['edit' , 'delete'] , $data = [])
{
    $btn = '<div class="btn btn-group">';
    if(in_array('edit' , $action))
    {
        $btn .= '<a href="/'.$route.'/'.$id.'/edit" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>';
    }
    if(in_array('delete' , $action))
    {
        $btn .= '<a href="/'.$route.'/'.$id.'/delete" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>';
    }
    if(in_array('show' , $action))
    {
        $btn .= '<a href="/'.$route.'/'.$id.'/show" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>';
    }
    if(in_array('custom' , $action))
    {
        foreach($data as $k=>$v){
         $btn.= '<a href="/'.$route.'/'.$id.'/'.$v['link'].'" class="btn btn-'.$v['btn'].' btn-sm"><i class="bi bi-'.$v['icon'].'"></i></a>';
        }


    }
    $btn .= '</div>';

    return $btn;
}

function rupiah($no)
{
    return 'Rp. '.number_format($no, 0, ',', '.');
}

function user_level($level)
{
     if($level == 'admin')
     {
          return '<span class="badge bg-success">Admin</span>';
     }elseif($level == 'user')
     {
          return '<span class="badge bg-primary">User</span>';
     }elseif($level == 'supplier')
     {
          return '<span class="badge bg-info">Supplier</span>';
     }
     else{
          return '<span class="badge bg-danger">Rejected</span>';
     }
}

function ekspedisi_status($status)
{
     //['available' , 'on_expedition' , 'not_available']

     if($status == 'available')
     {
          return '<span class="badge bg-success">Tersedia</span>';
     }elseif($status == 'on_expedition')
     {
          return '<span class="badge bg-primary">Dalam Pengiriman</span>';
     }elseif($status == 'not_available')
     {
          return '<span class="badge bg-danger">Tidak Tersedia</span>';
     }
     else{
          return '<span class="badge bg-danger">Rejected</span>';
     }
     
}

function shipping_status($status)
{
     // ['otw', 'waiting_pickup' , 'delivered','done']

     if($status == 'otw')
     {
          return '<span class="badge bg-success">Dalam Pengiriman</span>';
     }elseif($status == 'waiting_pickup')
     {
          return '<span class="badge bg-primary">Menunggu Pengambilan</span>';
     }elseif($status == 'delivered')
     {
          return '<span class="badge bg-info">Di Terima</span>';
     }
     elseif($status == 'done')
     {
          return '<span class="badge bg-success">Selesai</span>';
     }
     else{
          return '<span class="badge bg-danger">Rejected</span>';
     }
}