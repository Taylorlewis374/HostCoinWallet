@extends('layouts.app')
@extends('layouts.menu')

@section('content')
    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  26 New Messages!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  {{ $tranxCount }} Transactions
                </div>
              </div>
              <a href="{{ secure_url('history') }}" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                  Orders!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Coming Soon</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-support"></i>
                </div>
                <div class="mr-5">
                  Tickets!
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Coming Soon</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-area-chart"></i>
            HostCoin/US Dollar (HOSTC/USD) Price Chart
          </div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

        <div class="row">

          <div class="col-lg-8">

            <!-- Example Bar Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                HostCoin v/s AltCoins
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart" width="100" height="50"></canvas>
                  </div>
                  <div class="col-sm-4 text-center my-auto">
                    <div class="h4 mb-0 text-primary">324,693</div>
                    <div class="small text-muted">HOSTC Sold</div>
                    <hr>
                    <div class="h4 mb-0 text-warning">18,474</div>
                    <div class="small text-muted">HOSTC Mined</div>
                    <hr>
                    <div class="h4 mb-0 text-success">16,219</div>
                    <div class="small text-muted">HOSTC Available</div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            <!-- Card Columns Example Social Feed -->
            <div class="mb-0 mt-4">
              <i class="fa fa-newspaper-o"></i>
              News Feed</div>
            <hr class="mt-2">
            <div class="card-columns">

              <!-- Example Social Card -->
              @foreach($blogs as $b)
              <div class="card mb-3">
                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="public/includes/img/{{ $b->image }}" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#" data-toggle='modal' data-target='#descModal-{{ $b->id }}'>{{ $b->title }}</a>
                  </h6>
                  <p class="card-text small">
                  <?php $description = substr($b->description,0,50); 
                      echo $description."....<a href='#' data-toggle='modal' data-target='#descModal-".$b->id."'>read more</a></br>";
                  ?>
                    <a href="#"><?php 
                        $tags = $b->tags;
                        $tagsArr = explode(",", $tags);
                        $len = sizeof($tagsArr);
                        for($i=0; $i<$len; $i++){
                          echo ' #'.$tagsArr[$i];
                        }
                    ?></a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <hr class="my-0">
                <!--<div class="card-body small bg-faded">-->
                <!--  <div class="media">-->
                <!--    <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">-->
                <!--    <div class="media-body">-->
                <!--      <h6 class="mt-0 mb-1">-->
                <!--        <a href="#">John Smith</a>-->
                <!--      </h6>-->
                <!--      Very nice! I wish I was there! That looks amazing!-->
                <!--      <ul class="list-inline mb-0">-->
                <!--        <li class="list-inline-item">-->
                <!--          <a href="#">Like</a>-->
                <!--        </li>-->
                <!--        <li class="list-inline-item">-->
                <!--          ·-->
                <!--        </li>-->
                <!--        <li class="list-inline-item">-->
                <!--          <a href="#">Reply</a>-->
                <!--        </li>-->
                <!--      </ul>-->
                <!--      <div class="media mt-3">-->
                <!--        <a class="d-flex pr-3" href="#">-->
                <!--          <img src="http://placehold.it/45x45" alt="">-->
                <!--        </a>-->
                <!--        <div class="media-body">-->
                <!--          <h6 class="mt-0 mb-1">-->
                <!--            <a href="#">David Miller</a>-->
                <!--          </h6>-->
                <!--          Next time for sure!-->
                <!--          <ul class="list-inline mb-0">-->
                <!--            <li class="list-inline-item">-->
                <!--              <a href="#">Like</a>-->
                <!--            </li>-->
                <!--            <li class="list-inline-item">-->
                <!--              ·-->
                <!--            </li>-->
                <!--            <li class="list-inline-item">-->
                <!--              <a href="#">Reply</a>-->
                <!--            </li>-->
                <!--          </ul>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="card-footer small text-muted">
                  Posted <?php
                  $then = new DateTime($b->time);
                  $now = new DateTime();
                  $delta = $now->diff($then);
                
                  
                  //print_r($delta);
                  
                  $quantities = array(
                      'year' => $delta->y,
                      'month' => $delta->m,
                      'day' => $delta->d,
                      'hour' => $delta->h,
                      'minute' => $delta->i
                      );
                  
                  $str = '';
                  foreach($quantities as $unit => $value) {
                      if($value == 0) continue;
                      $str .= $value . ' ' . $unit;
                      if($value != 1) {
                          $str .= 's';
                      }
                      $str .=  ' ';
                  }
                  $str = $str == '' ? 'a moment ' : substr($str, 0, -2);
                  
                  echo $str.' ago';
                  ?>
                </div>
              </div>
              
              <!-- Modal -->
<div id="descModal-{{ $b->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ $b->title }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><?php echo htmlspecialchars_decode(stripslashes($b->description)) ?> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
              @endforeach
              
            </div>
            <!-- /Card Columns -->

          </div>

          <div class="col-lg-4">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                HostCoin Pie Chart
              </div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            <!-- Example Notifications Card -->
            <div class="card mb-3">
              <iframe src="https://tgwidget.com/widget/?id=59e66e4783ba88d05b8b4567" frameborder="0" scrolling="no" horizontalscrolling="no" verticalscrolling="no" width="100%" height="540px" async></iframe>
            </div>
          </div>
        </div>

        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Recent Blocks
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Height</th>
                    <th>Age</th>
                    <th>Transactions</th>
                    <th>Mined By</th>
                    <th>Size</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Height</th>
                    <th>Age</th>
                    <th>Transactions</th>
                    <th>Mined By</th>
                    <th>Size</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                   <tr>
                    <td>482671</td>
                    <td>27 minutes ago</td>
                    <td>1802</td>
                    <td></td>
                    <td>999140</td>
                  </tr>
                  <tr>
                    <td>482670</td>
                    <td>An Hour ago</td>
                    <td>2465</td>
                    <td>HOSTC</td>
                    <td>993498</td>
                  </tr>
                  <tr>
                    <td>4826769</td>
                    <td>2 Hours ago</td>
                    <td>2412</td>
                    <td></td>
                    <td>998524</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>HostCoin &copy; Copyright 2017</small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <script type="text/javascript">
      $('#dashboard').addClass('active');
    </script>
@stop
