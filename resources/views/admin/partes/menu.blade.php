<header class="cd-main-header">
	<a href="/admin" class="cd-logo">
		<img src="{{url('img/paperium.png')}}" width="92px" height="50px" alt="Logo">
	</a>
	<a href="#0" class="cd-nav-trigger"><span></span></a>
	<nav class="cd-nav">
		<ul class="cd-top-nav">
			<li class="has-children account">
				<a href="#0">{{Auth::guard('admin')->user()->nome}}</a>
					<ul>
						<li><a href="/admin/logout">Sair</a></li>
					</ul>
			</li>
		</ul>
	</nav>
</header>
<main class="cd-main-content">
	<nav class="cd-side-nav">
		<ul>
			<li class="cd-label">Livros Digitais</li>
				<li class="contact"><a href="{{route('admin::livros.index',['rota' => 'autor'])}}">Autores</a></li>
				<li class="filebook"><a href="{{route('admin::livros.index',['rota' => 'genero'])}}">Gêneros</a></li>
				<li class="paper"><a href="{{route('admin::livros.index',['rota' => 'livro'])}}">Livros</a></li>
			<li class="cd-label">Acervo Físico</li>
				<li class="paper"><a href="{{url('/admin/fisico')}}">Livros físicos</a></li>
			<li class="cd-label">Pessoal</li>
				<li class="password"><a href="#" data-toggle="modal" data-target="#mudar_senha">Mudar Senha</a></li>
			<br>
			<li class="action-btn"><a href="/admin/logout">Sair</a></li>
		</ul>
	</nav>

