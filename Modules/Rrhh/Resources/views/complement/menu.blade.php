<div class="menu_section">
  <div class="con_ImCos" style= "color= red">
    <link rel="shortcut icon" href="{{{ asset('assets/images/logo.png') }}}" type="image/x-icon" />
    <img src="{{{ asset('assets/images/uatfblanco.png') }}}" alt="Logo-UATF">
    <h3 class="titleUnidPrin">Recursos Humanos</h3>
  </div>
  <hr>
  {{-- <ul class="nav side-menu J_HovSeItem scrollable-menu" role="menu"> --}}
  <ul class="nav side-menu J_HovSeItem">
    <li>
      <a href="{{url('/')}}" class="J_JxNavLinkSty"><i class="fa fa-home"></i>Inicio</a>
    </li>
    @permission('administracion.listrhh')
    <li><a class="J_JxNavLinkSty"><i class="fa fa-desktop"></i> <span class="title_SubNav">Administración </span><span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu J_NacHildBac">
        <div class="cont-title-navsub">
          <span>Administración</span>
        </div>
        <li class="InTolinkSub_Tit">
          <span class="title_Xs">Administración</span>
        </li>
        @permission('administracion.personalrrhh')
        <li class="InTolinkSub">
          <a href="{{route('rrhh.personals')}}" class="J_JxNavLinkStyXs"><i class="fa fa-user"></i> Personas</a>
        </li>
        @endpermission
        @permission('administracion.personalrrhh')
        <li class="InTolinkSub">
          <a href="{{route('admin.horarios.lista')}}" class="J_JxNavLinkStyXs"><i class="fa fa-book"></i> Horarios</a>
        </li>
        @endpermission
      </ul>
    </li>
    @endpermission
  </ul>
</div>
