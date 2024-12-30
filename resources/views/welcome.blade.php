@extends('layouts.tabler-template')
@section('content') 
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
          <div class="row">
              <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="row row-deck row-cards">
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  @can('staffAdmin', App\Models\User::class)
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Total Grants Approved</div>
                      <div class="ms-auto lh-1">
                        <!--<div class="dropdown">
                          <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div>
                        </div>-->
                      </div>
                    </div>
                    <div class="h1 mb-3">{{ $total_grants }}</div>
                   
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Total Grants Amount (RM) Approved</div>
                      <div class="ms-auto lh-1">
                        <!--<div class="dropdown">
                          <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item active" href="#">Last 7 days</a>
                            <a class="dropdown-item" href="#">Last 30 days</a>
                            <a class="dropdown-item" href="#">Last 3 months</a>
                          </div>
                        </div>-->
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-0 me-2">{{ "RM " . $total_grants_amount }}</div>
                      
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Number of Staffs</div>
                      <div class="ms-auto lh-1">
                  
                      </div>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-3 me-2">{{ $totalStaff }}</div>
                     
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Number of Academicians</div>
                      
                    </div>
                    <div class="d-flex align-items-baseline">
                      <div class="h1 mb-3 me-2">{{$totalAcademician}}</div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- <div class="col-12">
                <div class="row row-cards">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar">Download SVG icon from http://tabler-icons.io/i/currency-dollar
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              132 Sales
                            </div>
                            <div class="text-secondary">
                              12 waiting payments
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"> Download SVG icon from http://tabler-icons.io/i/shopping-cart 
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              78 Orders
                            </div>
                            <div class="text-secondary">
                              32 shipped
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-twitter text-white avatar"> Download SVG icon from http://tabler-icons.io/i/brand-twitter 
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              623 Shares
                            </div>
                            <div class="text-secondary">
                              16 today
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-facebook text-white avatar">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              132 Likes
                            </div>
                            <div class="text-secondary">
                              21 today
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="col-lg-6">
                <div class="card">
                      <div class="card-body">
                          <h3 class="card-title text-center">Grant Amounts by Provider</h3>
                          <canvas id="grantProviderPieChart"></canvas>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Milestone Status Breakdown</h3>
                        <canvas id="milestonePieChart" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
             
                 
              
              <!--<div class="col-12">
                <div class="card card-md">
                  <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                       Download SVG icon from http://tabler-icons.io/i/ghost 
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-10">
                        <h3 class="h1">Tabler Icons</h3>
                        <div class="markdown text-secondary">
                          All icons come from the Tabler Icons set and are MIT-licensed. Visit
                          <a href="https://tabler-icons.io" target="_blank" rel="noopener">tabler-icons.io</a>,
                          download any of the 4637 icons in SVG, PNG or&nbsp;React and use them in your favourite design tools.
                        </div>
                        <div class="mt-3">
                          <a href="https://tabler-icons.io" class="btn btn-primary" target="_blank" rel="noopener">Download icons</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Most Visited Pages</h3>
                  </div>
                  <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                      <thead>
                        <tr>
                          <th>Page name</th>
                          <th>Visitors</th>
                          <th>Unique</th>
                          <th colspan="2">Bounce rate</th>
                        </tr>
                      </thead>
                      <tr>
                        <td>
                          
                          <a href="#" class="ms-1" aria-label="Open website"> Download SVG icon from http://tabler-icons.io/i/link
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">4,896</td>
                        <td class="text-secondary">3,654</td>
                        <td class="text-secondary">82.54%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-1"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /form-elements.html
                          <a href="#" class="ms-1" aria-label="Open website">Download SVG icon from http://tabler-icons.io/i/link
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">3,652</td>
                        <td class="text-secondary">3,215</td>
                        <td class="text-secondary">76.29%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-2"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /index.html
                          <a href="#" class="ms-1" aria-label="Open website"> Download SVG icon from http://tabler-icons.io/i/link
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">3,256</td>
                        <td class="text-secondary">2,865</td>
                        <td class="text-secondary">72.65%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-3"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /icons.html
                          <a href="#" class="ms-1" aria-label="Open website">Download SVG icon from http://tabler-icons.io/i/link
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">986</td>
                        <td class="text-secondary">865</td>
                        <td class="text-secondary">44.89%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-4"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /docs/
                          <a href="#" class="ms-1" aria-label="Open website">Download SVG icon from http://tabler-icons.io/i/link 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">912</td>
                        <td class="text-secondary">822</td>
                        <td class="text-secondary">41.12%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-5"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /accordion.html
                          <a href="#" class="ms-1" aria-label="Open website"> Download SVG icon from http://tabler-icons.io/i/link 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">855</td>
                        <td class="text-secondary">798</td>
                        <td class="text-secondary">32.65%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-6"></div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <a href="https://github.com/sponsors/codecalm" class="card card-sponsor" target="_blank" rel="noopener" style="background-image: url(./static/sponsor-banner-homepage.svg)" aria-label="Sponsor Tabler!">
                  <div class="card-body"></div>
                </a>
              </div> -->
              @endcan

              @can('isAcademician', App\Models\User::class)


              <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">Total Grants Leads</div>
                    </div>
              <div class="h1 mb-3">{{ $total_grants }}</div>
                   
                
              </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                    <div class="subheader">Total Grants as Member</div>
                    </div>
                    <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3">{{ $total_grants_member }}</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                    <h3 class="card-title text-center">Grants Overview</h3>
                    <canvas id="grantsBarChart"></canvas>
                    </div>
                </div>
            </div>
            

              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                    <div class="subheader">Total Completed Milestone</div>
                    </div>
                    <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3">{{ $completed_milestones }}</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                    <div class="subheader">Total Pending Milestone</div>
                    </div>
                    <div class="d-flex align-items-baseline">
                    <div class="h1 mb-3">{{ $pending_milestones }}</div>
                    </div>
                  </div>
                </div>
              </div>
          
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">Milestones Overview</h3>
                  <canvas id="milestonesPieChart"></canvas>
                </div>
              </div>
            </div>
          
              @endcan


              <!--<div class="col-md-6 col-lg-4">
                <div class="card">
          
              
                      
                      
                      
                Empty space
                     
                     
                     
                    
                  
                </div>
              </div>-->
              <!--<div class="col-md-12 col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tasks</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                      <tr>
                        <td class="w-1 pe-0">
                          <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                        </td>
                        <td class="w-100">
                          <a href="#" class="text-reset">Extend the data model.</a>
                        </td>
                        <td class="text-nowrap text-secondary">
                           Download SVG icon from http://tabler-icons.io/i/calendar 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                          August 04, 2021
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/check
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            2/7
                          </a>
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/message 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                            3</a>
                        </td>
                        <td>
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-1 pe-0">
                          <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                        </td>
                        <td class="w-100">
                          <a href="#" class="text-reset">Verify the event flow.</a>
                        </td>
                        <td class="text-nowrap text-secondary">
                           Download SVG icon from http://tabler-icons.io/i/calendar 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                          January 03, 2019
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/check 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            3/10
                          </a>
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/message 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                            6</a>
                        </td>
                        <td>
                          <span class="avatar avatar-sm">JL</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-1 pe-0">
                          <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                        </td>
                        <td class="w-100">
                          <a href="#" class="text-reset">Database backup and maintenance</a>
                        </td>
                        <td class="text-nowrap text-secondary">
                           Download SVG icon from http://tabler-icons.io/i/calendar 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                          December 28, 2018
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/check 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            0/6
                          </a>
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/message 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                            1</a>
                        </td>
                        <td>
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/002m.jpg)"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-1 pe-0">
                          <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                        </td>
                        <td class="w-100">
                          <a href="#" class="text-reset">Identify the implementation team.</a>
                        </td>
                        <td class="text-nowrap text-secondary">
                           Download SVG icon from http://tabler-icons.io/i/calendar 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                          November 07, 2020
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/check 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            6/10
                          </a>
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/message 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                            12</a>
                        </td>
                        <td>
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/003m.jpg)"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-1 pe-0">
                          <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" >
                        </td>
                        <td class="w-100">
                          <a href="#" class="text-reset">Define users and workflow</a>
                        </td>
                        <td class="text-nowrap text-secondary">
                           Download SVG icon from http://tabler-icons.io/i/calendar 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                          November 23, 2021
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/check 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            3/7
                          </a>
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/message 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                            5</a>
                        </td>
                        <td>
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000f.jpg)"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-1 pe-0">
                          <input type="checkbox" class="form-check-input m-0 align-middle" aria-label="Select task" checked >
                        </td>
                        <td class="w-100">
                          <a href="#" class="text-reset">Check Pull Requests</a>
                        </td>
                        <td class="text-nowrap text-secondary">
                           Download SVG icon from http://tabler-icons.io/i/calendar 
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                          January 14, 2021
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                            < Download SVG icon from http://tabler-icons.io/i/check 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            2/9
                          </a>
                        </td>
                        <td class="text-nowrap">
                          <a href="#" class="text-secondary">
                             Download SVG icon from http://tabler-icons.io/i/message 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                            3</a>
                        </td>
                        <td>
                          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/001f.jpg)"></span>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>-->
              
            </div>
          </div>
        </div>
@endsection  

@can('staffAdmin', App\Models\User::class)
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const data = @json($data); // Pass data from PHP to JavaScript

			const ctx = document.getElementById('milestonePieChart').getContext('2d');
			new Chart(ctx, {
				type: 'pie',
				data: {
					labels: ['Pending', 'Completed'], // Define milestone statuses
					datasets: [{
						label: 'Milestones Status',
						data: [data['Pending'], data['Completed']], // Use pending and completed counts
						backgroundColor: [
							'rgba(255, 206, 86, 0.2)', // Pending color
							'rgba(75, 192, 192, 0.2)', // Completed color
						],
						borderColor: [
							'rgba(255, 206, 86, 1)', // Pending border color
							'rgba(75, 192, 192, 1)', // Completed border color
						],
						borderWidth: 1,
					}]
				},
				options: {
					responsive: true,
					plugins: {
						legend: {
							position: 'top',
						},
						tooltip: {
							enabled: true,
						},
					}
				}
			});
		});
	</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = @json($labels); // Pass grant providers from PHP to JavaScript
        const data_grant = @json($data_grant);     // Pass grant amounts from PHP to JavaScript

        const ctx = document.getElementById('grantProviderPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels, // Grant providers
                datasets: [{
                    label: 'Grant Amounts by Provider',
                    data: data_grant, // Grant amounts
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(231, 74, 59, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(231, 74, 59, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'RM ' + tooltipItem.raw;
                            }
                        }
                    },
                }
            }
        });
    });
</script>
@endcan

@can('isAcademician', App\Models\User::class)
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('grantsBarChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Total Grants Leads', 'Total Grants as Member'],
        datasets: [{
          label: 'Grants Count',
          data: [{{ $total_grants }}, {{ $total_grants_member }}],
          backgroundColor: [
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)'
          ],
          borderColor: [
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });


</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const milestonesCtx = document.getElementById('milestonesPieChart').getContext('2d');
    new Chart(milestonesCtx, {
      type: 'pie',
      data: {
        labels: ['Completed Milestones', 'Pending Milestones'],
        datasets: [{
          label: 'Milestones Status',
          data: [{{ $completed_milestones }}, {{ $pending_milestones }}],
          backgroundColor: [
            'rgba(75, 192, 192, 0.2)',
            'rgba(255, 99, 132, 0.2)'
          ],
          borderColor: [
            'rgba(75, 192, 192, 1)',
            'rgba(255, 99, 132, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            enabled: true,
          },
        }
      }
    });
  });
</script>
@endcan
