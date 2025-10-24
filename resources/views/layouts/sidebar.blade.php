  @php
      $role = Auth::user()->role ?? null;
  @endphp

  <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
          <a href="{{ url('/admin/dashboard') }}" class="d-flex align-items-center text-decoration-none">
              <img src="{{ asset('assets/images/logo/logo-wellnet.svg') }}" alt="Logo kiri" class="img-fluid me-2"
                  style="max-height: 45px; width: auto;" />

              <span class="fw-bold text-dark fs-4">WELLNET</span>
          </a>

      </div>

      <nav class="sidebar-nav">
          <ul>
              @if ($role === 'super_admin')
                  <li class="nav-item active">
                      <a href="{{ url('/') }}">
                          <span class="icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z">
                                  </path>
                                  <path
                                      d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z">
                                  </path>
                              </svg>
                          </span>
                          <span class="text">Dashboard</span>
                      </a>
                  </li>
                  <span class="divider">
                      <hr />
                  </span>
                  <li class="nav-item">
                      <a href="{{ route('users.index') }}">
                          <span class="icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M3.33334 11.6667C3.33334 10.7462 4.07954 10 5.00001 10H15C15.9205 10 16.6667 10.7462 16.6667 11.6667C16.6667 15.3486 13.6819 18.3333 10 18.3333C6.31811 18.3333 3.33334 15.3486 3.33334 11.6667Z">
                                  </path>
                                  <path
                                      d="M13.3333 4.99999C13.3333 6.84094 11.8409 8.33332 9.99999 8.33332C8.15904 8.33332 6.66666 6.84094 6.66666 4.99999C6.66666 3.15904 8.15904 1.66666 9.99999 1.66666C11.8409 1.66666 13.3333 3.15904 13.3333 4.99999Z">
                                  </path>
                              </svg>
                          </span>
                          <span class="text">Users</span>
                      </a>
                  </li>
              @elseif ($role === 'admin')
                  <li class="nav-item nav-item-has-children">
                      <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_5"
                          aria-controls="ddmenu_5" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M3.33334 11.6667C3.33334 10.7462 4.07954 10 5.00001 10H15C15.9205 10 16.6667 10.7462 16.6667 11.6667C16.6667 15.3486 13.6819 18.3333 10 18.3333C6.31811 18.3333 3.33334 15.3486 3.33334 11.6667Z">
                                  </path>
                                  <path
                                      d="M13.3333 4.99999C13.3333 6.84094 11.8409 8.33332 9.99999 8.33332C8.15904 8.33332 6.66666 6.84094 6.66666 4.99999C6.66666 3.15904 8.15904 1.66666 9.99999 1.66666C11.8409 1.66666 13.3333 3.15904 13.3333 4.99999Z">
                                  </path>
                              </svg>
                          </span>
                          <span class="text">Users</span>
                      </a>
                      <ul id="ddmenu_5" class="collapse dropdown-nav">
                          <li>
                              <a href="{{ route('users.index') }}"> Admins </a>
                          </li>
                          <li>
                              <a href="{{ route('soal_quiz.index') }}"> Users/parents </a>
                          </li>
                          <li>
                              <a href="{{ route('psychoeducation.index') }}"> Children </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item nav-item-has-children">
                      <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4"
                          aria-controls="ddmenu_4" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M5.48663 1.1466C5.77383 0.955131 6.16188 1.03274 6.35335 1.31994L6.87852 2.10769C7.20508 2.59755 7.20508 3.23571 6.87852 3.72556L6.35335 4.51331C6.16188 4.80052 5.77383 4.87813 5.48663 4.68666C5.19943 4.49519 5.12182 4.10715 5.31328 3.81994L5.83845 3.03219C5.88511 2.96221 5.88511 2.87105 5.83845 2.80106L5.31328 2.01331C5.12182 1.72611 5.19943 1.33806 5.48663 1.1466Z" />
                                  <path
                                      d="M2.49999 5.83331C2.03976 5.83331 1.66666 6.2064 1.66666 6.66665V10.8333C1.66666 13.5948 3.90523 15.8333 6.66666 15.8333H9.99999C12.1856 15.8333 14.0436 14.431 14.7235 12.4772C14.8134 12.4922 14.9058 12.5 15 12.5H16.6667C17.5872 12.5 18.3333 11.7538 18.3333 10.8333V8.33331C18.3333 7.41284 17.5872 6.66665 16.6667 6.66665H15C15 6.2064 14.6269 5.83331 14.1667 5.83331H2.49999ZM14.9829 11.2496C14.9942 11.1123 15 10.9735 15 10.8333V7.91665H16.6667C16.8967 7.91665 17.0833 8.10319 17.0833 8.33331V10.8333C17.0833 11.0634 16.8967 11.25 16.6667 11.25H15L14.9898 11.2498L14.9829 11.2496Z" />
                                  <path
                                      d="M8.85332 1.31994C8.6619 1.03274 8.27383 0.955131 7.98663 1.1466C7.69943 1.33806 7.62182 1.72611 7.81328 2.01331L8.33848 2.80106C8.38507 2.87105 8.38507 2.96221 8.33848 3.03219L7.81328 3.81994C7.62182 4.10715 7.69943 4.49519 7.98663 4.68666C8.27383 4.87813 8.6619 4.80052 8.85332 4.51331L9.37848 3.72556C9.70507 3.23571 9.70507 2.59755 9.37848 2.10769L8.85332 1.31994Z" />
                                  <path
                                      d="M10.4867 1.1466C10.7738 0.955131 11.1619 1.03274 11.3533 1.31994L11.8785 2.10769C12.2051 2.59755 12.2051 3.23571 11.8785 3.72556L11.3533 4.51331C11.1619 4.80052 10.7738 4.87813 10.4867 4.68666C10.1994 4.49519 10.1218 4.10715 10.3133 3.81994L10.8385 3.03219C10.8851 2.96221 10.8851 2.87105 10.8385 2.80106L10.3133 2.01331C10.1218 1.72611 10.1994 1.33806 10.4867 1.1466Z" />
                                  <path
                                      d="M2.49999 16.6667C2.03976 16.6667 1.66666 17.0398 1.66666 17.5C1.66666 17.9602 2.03976 18.3334 2.49999 18.3334H14.1667C14.6269 18.3334 15 17.9602 15 17.5C15 17.0398 14.6269 16.6667 14.1667 16.6667H2.49999Z" />
                              </svg>
                          </span>
                          <span class="text">Quiz & Psychoeducation</span>
                      </a>
                      <ul id="ddmenu_4" class="collapse dropdown-nav">
                          <li>
                              <a href="{{ route('tema_quiz.index') }}"> Tema Quiz </a>
                          </li>
                          <li>
                              <a href="{{ route('soal_quiz.index') }}"> Soal Quiz </a>
                          </li>
                          <li>
                              <a href="{{ route('psychoeducation.index') }}"> Materi Psychoeducation </a>
                          </li>
                          <li>
                              <a href="{{ route('log_quiz.index') }}"> Log Quiz User </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item nav-item-has-children">
                      <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
                          aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M11.8097 1.66667C11.8315 1.66667 11.8533 1.6671 11.875 1.66796V4.16667C11.875 5.43232 12.901 6.45834 14.1667 6.45834H16.6654C16.6663 6.48007 16.6667 6.50186 16.6667 6.5237V16.6667C16.6667 17.5872 15.9205 18.3333 15 18.3333H5.00001C4.07954 18.3333 3.33334 17.5872 3.33334 16.6667V3.33334C3.33334 2.41286 4.07954 1.66667 5.00001 1.66667H11.8097ZM6.66668 7.70834C6.3215 7.70834 6.04168 7.98816 6.04168 8.33334C6.04168 8.67851 6.3215 8.95834 6.66668 8.95834H10C10.3452 8.95834 10.625 8.67851 10.625 8.33334C10.625 7.98816 10.3452 7.70834 10 7.70834H6.66668ZM6.04168 11.6667C6.04168 12.0118 6.3215 12.2917 6.66668 12.2917H13.3333C13.6785 12.2917 13.9583 12.0118 13.9583 11.6667C13.9583 11.3215 13.6785 11.0417 13.3333 11.0417H6.66668C6.3215 11.0417 6.04168 11.3215 6.04168 11.6667ZM6.66668 14.375C6.3215 14.375 6.04168 14.6548 6.04168 15C6.04168 15.3452 6.3215 15.625 6.66668 15.625H13.3333C13.6785 15.625 13.9583 15.3452 13.9583 15C13.9583 14.6548 13.6785 14.375 13.3333 14.375H6.66668Z">
                                  </path>
                                  <path
                                      d="M13.125 2.29167L16.0417 5.20834H14.1667C13.5913 5.20834 13.125 4.74197 13.125 4.16667V2.29167Z">
                                  </path>
                              </svg>
                          </span>
                          <span class="text">Wellbeing</span>
                      </a>
                      <ul id="ddmenu_1" class="collapse dropdown-nav">
                          <li>
                              <a href="register-badword.html"> Register Badword </a>
                          </li>
                          <li>
                              <a href="log-pelanggaran.html"> Log Pelanggaran </a>
                          </li>
                      </ul>
                  </li>
              @endif
          </ul>
      </nav>
  </aside>
  <div class="overlay"></div>
