Clique no link para redefinir sua senha: <a href="{{ $link = url('admin/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
