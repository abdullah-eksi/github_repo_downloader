<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub Repo İndirici</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #loadingMessage {
            display: none;
            color: #2c3e50;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Banner -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">GitHub Repo İndirici</h1>
            <p class="mt-2">Kolayca GitHub repositorylerini indirin</p>
        </div>
    </header>

    <!-- Form Section -->
    <main class="flex-grow container mx-auto flex flex-col items-center justify-center py-12">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <form id="downloadForm" class="space-y-6">
                <div>
                    <label for="repoUrl" class="block text-sm font-medium text-gray-700">GitHub Repo URL'si:</label>
                    <input type="text" id="repoUrl" name="repoUrl" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                
                <div>
                    <label for="branch" class="block text-sm font-medium text-gray-700">Branch İsmi:</label>
                    <input type="text" id="branch" name="branch" value="main" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                
                <div>
                    <input type="submit" value="İndir" class="w-full bg-green-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                </div>
            </form>
            <div id="loadingMessage" class="mt-4">Dosyanız hazırlanıyor, lütfen bekleyin...</div>
            <div id="downloadLink" class="mt-4"></div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 GitHub Repo İndirici. Tüm hakları saklıdır.</p>
        </div>
    </footer>

    <script>
        $(document).ready(function(){
            $('#downloadForm').on('submit', function(e){
                e.preventDefault();
                $('#loadingMessage').show();
                $('#downloadLink').empty();

                $.ajax({
                    url: 'download.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#loadingMessage').hide();
                        $('#downloadLink').html(response);
                    },
                    error: function(){
                        $('#loadingMessage').hide();
                        $('#downloadLink').html('<p>Bir hata oluştu. Lütfen tekrar deneyin.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
