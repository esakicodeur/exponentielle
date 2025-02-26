<x-auth-layout title="Connexion" :action="route('login')" submitMessage="Se connecter" msg="N'avez-vous pas un compte ?" choix="S'inscrire !" lien="login">

    <x-input name="email" type="email" placeholder="Entrez votre e-mail..."/>
    <x-input name="password" type="password" placeholder="Entrez votre mot de passe..."/>
    <div class="flex items-center justify-between mt-10">
        <div class="flex items-center">
            <input id="remember" type="checkbox" name="remember" class="form-checkbox h-4 w-4 border border-black shadow-[-7px_7px_0px_#000000] text-black focus:ring-black">
            <label for="remember" class="text-black ml-5">Rester connecte</label>
        </div>
    </div>
</x-auth-layout>
