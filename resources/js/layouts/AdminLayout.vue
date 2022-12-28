<template>
  <div class="wrapper">
    <div
      class="preloader flex-column justify-content-center align-items-center"
      style="height: 0px;"
    >
      <img
        src="http://127.0.0.1:8000/vendor/adminlte/dist/img/AdminLTELogo.png"
        class="animation__shake"
        alt="AdminLTE Preloader Image"
        width="60"
        height="60"
        style="display: none;"
      />
    </div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#">
            <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline" action="#" method="get">
              <input type="hidden" name="_token" value="6CcT0qNzq8OJcJTovGgnkmjYsFDyA0Fks9MqFdVg" />
              <div class="input-group">
                <input
                  class="form-control form-control-navbar"
                  type="search"
                  name="adminlteSearch"
                  placeholder="search"
                  aria-label="search"
                />
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="http://127.0.0.1:8000/home" class="brand-link">
        <img
          src="http://127.0.0.1:8000/vendor/adminlte/dist/img/AdminLTELogo.png"
          alt="Admin Logo"
          class="brand-image img-circle elevation-3"
          style="opacity: 0.8;"
        />
        <span class="brand-text font-weight-light"> <b>Admin</b>LTE </span>
      </a>
      <div class="sidebar">
        <nav class="pt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <li>
              <div class="form-inline my-2">
                <div class="input-group" data-widget="sidebar-search" data-arrow-sign="»">
                  <input
                    class="form-control form-control-sidebar"
                    type="search"
                    placeholder="search"
                    aria-label="search"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      <i class="fas fa-fw fa-search"></i>
                    </button>
                  </div>
                </div>
                <div class="sidebar-search-results">
                  <div class="list-group">
                    <a href="#" class="list-group-item">
                      <div class="search-title">
                        <strong class="text-light"></strong>N <strong class="text-light"></strong>o
                        <strong class="text-light"></strong>
                        <strong class="text-light"></strong>e <strong class="text-light"></strong>l
                        <strong class="text-light"></strong>e <strong class="text-light"></strong>m
                        <strong class="text-light"></strong>e <strong class="text-light"></strong>n
                        <strong class="text-light"></strong>t <strong class="text-light"></strong>
                        <strong class="text-light"></strong>f <strong class="text-light"></strong>o
                        <strong class="text-light"></strong>u <strong class="text-light"></strong>n
                        <strong class="text-light"></strong>d <strong class="text-light"></strong>!
                        <strong class="text-light"></strong>
                      </div>
                      <div class="search-path"></div>
                    </a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://127.0.0.1:8000/admin/pages">
                <i class="far fa-fw fa-file"></i>
                <p>Pages <span class="badge badge-success right"> 4 </span></p>
              </a>
            </li>
            <li class="nav-header">ACCOUNT SETTINGS</li>
            <li class="nav-item">
              <router-link :to="{ name: 'ViewProduct' }" class="nav-link">
                <i class="fas fa-fw fa-user"></i>
                <p>Home</p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'TrashProduct' }" class="nav-link">
                <i class="fas fa-fw fa-user"></i>
                <p>Trash</p>
              </router-link>
            </li>
            <li class="nav-header">LABELS</li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-fw fa-circle text-red"></i>
                <p>Important</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-fw fa-circle text-yellow"></i>
                <p>Warning</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="far fa-fw fa-circle text-cyan"></i>
                <p>Information</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper" style="min-height: 952px;">
      <slot />
    </div>
    <div id="sidebar-overlay"></div>
  </div>
</template>
