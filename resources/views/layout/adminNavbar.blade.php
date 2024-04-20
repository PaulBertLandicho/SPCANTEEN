<center>
      <div class="containershadow">
        <div class="center-icon">
          <img src="https://i.ibb.co/7QLKBSz/423062764-1342544113808335-7405620093325838006-n-removebg-preview.png" alt="423062764-1342544113808335-7405620093325838006-n-removebg-preview" style="width:220px;height:180px;margin-right:10px;">
          <br>
          <br>
          <div class="icon-bar">
            <a class="active" href="admindashboard">
              <span class="fa fa-dashboard"  style="margin-left:6px;">
                <span style="margin-left: 20px;">Dashboard</span>
            </a>
            <a class="active" href="addproductlist">
              <span class="far fa-plus-square"  style="margin-left:6px;">
                <span style="margin-left:20px;">Add Products</span>
            </a>
            <a class="active" href="adminorderlist">
              <span class="far fa-list-alt"  style="margin-left:6px;">
                <span style="margin-left:20px;">Order List</span>
            </a>
            <a class="active" href="#">
              <span class="far fa-address-book" style="margin-left:6px;">
                <span style="margin-left:20px;">Transaction History</span>
            </a>
            <a class="active" href="orderscanner">
              <span class="fa fa-qrcode" style="margin-left:6px;">
                <span style="margin-left:20px;">Order Scanner</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" style="border:none; border-color: white; background-color: transparent; margin-right: 98px;">
    <a class="active">
        <span class="fa fa-sign-out">
            <span style="margin-left:15px;">Logout</span>  
        </a>
</button>
            
            <p style="color: #999; font-size:13px; margin-top:45px;">
              <b>SPC CANTEEN</b>
              <br>© 2024 All Rights Reserved
            </p>
            </form>
    </center>