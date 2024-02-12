clear
echo "=================================="
echo "===== USER: [$(whoami)]"
echo "===== [PHP $(php -r 'echo phpversion();')]"
echo "=================================="
echo ""
echo ""
echo "=================================="
echo "===== PREPARING YOUR PROJECT..."
echo "=================================="
echo ""
# Setup the .env file
copy=true
while $yn; do
    read -p "🎬 DEV ---> DID YOU WANT TO COPY THE .ENV.EXAMPLE TO .ENV? (y/n) " yn
    case $yn in
        [Yy]* ) echo -e "\e[92mCopying .env.example to .env \e[39m"; cp .env.example .env; copy=true; break;;
        [Nn]* ) echo -e "\e[92mContinuing with your .env configuration \e[39m"; copy=false; break;;
        * ) echo "Please answer yes or no."; copy=true; ;;
    esac
done
echo ""
echo "=================================="
echo ""
echo ""
# Ask user to confirm that .env file is properly setup before continuing
if [ "$copy" = true ]; then
    answ=true
    while $cond; do
        read -p "🎬 DEV ---> DID YOU SETUP YOUR DATABASE CREDENTIALS IN THE .ENV FILE? (y/n) " cond
        case $cond in
            [Yy]* ) echo -e "\e[92mPerfect let's continue with the setup"; answ=false; break;;
            [Nn]* ) exit;;
            * ) echo "Please answer yes or no."; answ=false; ;;
        esac
    done
fi
echo ""
echo "=================================="
echo ""
echo ""
# Install laravel dependencies with composer
echo "🎬 DEV ---> COMPOSER INSTALL"
composer install
echo ""
echo "=================================="
echo ""
echo ""
# Generate larave key
echo "🎬 DEV ---> PHP ARTISAN KEY:GENERATE"
php artisan key:generate
echo ""
echo "=================================="
echo ""
echo ""
# Run database migrations
echo "🎬 DEV ---> php artisan migrate:fresh"
php artisan migrate:fresh
echo ""
echo ""
echo "=================================="
echo ""
echo ""
# Seeding database
echo "🎬 DEV ---> php artisan db:seed"
php artisan db:seed
echo ""
echo ""
echo "=================================="
echo ""
echo ""
# Run optimization commands for laravel
echo "🎬 DEV ---> php artisan optimize:clear"
php artisan optimize:clear
php artisan route:clear
echo ""
echo ""
echo -e "\e[92m==================================\e[39m";
echo -e "\e[92m============== DONE ==============\e[39m";
echo -e "\e[92m==================================\e[39m";
echo ""
echo ""
while $yees; do
    read -p "🎬 DEV ---> DID YOU WANT TO START THE SERVER? (y/n) " yees
    case $yees in
        [Yy]* ) echo -e "\e[92mStarting server\e[39m"; php artisan serve; break;;
        [Nn]* ) exit;;
        * ) echo "Please answer yes or no."; ;;
    esac
done
