<x-auth-layout title="Inscription" :action="route('register')" submitMessage="S'inscrire" msg="Avez-vous deja un compte ?" choix="Se connecter !" lien="register">

    <x-input name="name" placeholder="Entrez votre nom..."/>
    <x-input name="email" type="email" placeholder="Entrez votre e-mail..."/>
    <x-input name="password" type="password" placeholder="Entrez votre mot de passe..."/>
    <x-input name="password_confirmation" type="password" placeholder="Confirmez votre mot de passe..."/>

</x-auth-layout>
