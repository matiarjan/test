 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column pr-0 text-right">
          <li class="nav-item">
            <a  id="test1" class="nav-link">
              <span data-feather="home"></span>
              تعداد اعضا با  mysql<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
			<form action="index.php" method="post">
				<span data-feather="file"></span>
				<input id="test2" class="nav-link inputform_sidebar" type="submit" name="test2" value=" تعداد اعضا با (PHP)">
			</form>
          </li>
          <li class="nav-item">
            <form action="index.php" method="post">
				<span data-feather="file"></span>
				<input id="test3" class="nav-link inputform_sidebar" type="submit" name="test3" value="شروع یا حرف ب باSQL">
			</form>
          </li>
          <li id="test4" class="nav-item">
            <a class="nav-link">
              <span data-feather="users"></span>
              شروع یا حرف ب باPHP
            </a>
          </li>
          <li class="nav-item">
            <form action="index.php" method="post">
				<span data-feather="file"></span>
				<input id="test5" class="nav-link inputform_sidebar" type="submit" name="test5" value="5 حرفی -پایان با ی (SQL)">
			</form>
          </li>
          <li class="nav-item">
            <form action="index.php" method="post">
				<span data-feather="file"></span>
				<input id="test6" class="nav-link inputform_sidebar" type="submit" name="test6" value="5 حرفی -پایان با ی (PHP)">
			</form>
          </li>
		  <li id="test7" class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <span data-feather="layers"></span>
              مشاغلی که حداقل 50 نفر دارا باشند(SQL)
            </a>
          </li>
		  <li class="nav-item">
            <form action="index.php" method="post">
				<span data-feather="file"></span>
				<input id="test8" class="nav-link inputform_sidebar" type="submit" name="test8" value="مشاغلی که حداقل 50 نفر دارا باشند(PHP)">
			</form>
          </li>
        </ul>
      </div>
    </nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-right">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">اسم مشاغلی که حداقل 50 نفر آن را دارا باشند به ترتیب حروف الفبا با استفاده از دستورات mysql (نمایش در مودال با ایجکس)</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-dark">
			  <thead>
				<tr>
				 <th scope="col">شغل</th>
				  <th scope="col">تعداد</th>
				</tr>
			  </thead>
			  <tbody></tbody>
		  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
       
      </div>
    </div>
  </div>
</div> 