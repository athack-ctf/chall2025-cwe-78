<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CWE-78: OS Command Injection</title>
    <link href="/css/index.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <script>
        function isValidDomain(domain) {
            const domainRegex = /^(?!-)([a-zA-Z0-9-]{1,63}(?<!-)\.)+[a-zA-Z]{2,}$/;
            return domainRegex.test(domain);
        }

        function validateForm(event) {
            const domainInput = document.getElementById('domain').value;
            if (!isValidDomain(domainInput)) {
                event.preventDefault();
                alert("Invalid domain name. Please enter a valid domain.");
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            form.addEventListener('submit', validateForm);
        });
    </script>
</head>
<body>
<div class="container">
    <h1>CWE-78: OS Command Injection</h1>
    <p>
        CWE-78 refers to an "OS Command Injection" vulnerability. This occurs when an application constructs
        a command to be executed by the operating system using untrusted input. if the input is not properly
        sanitized or validated, attackers can inject malicious commands, leading to unauthorized actions
        such as data exposure, system compromise, or more.
    </p>
    <h2>References</h2>
    <ul>
        <li><a href="https://owasp.org/www-community/attacks/Command_Injection" target="_blank">OWASP: Command
                Injection</a></li>
        <li><a href="https://cwe.mitre.org/data/definitions/78.html" target="_blank">MITRE: CWE-78</a></li>
    </ul>

    <h2>Btw, do you know how to <code>dig</code>?</h2>

    <p>Below is a simple tool that uses the <code>dig</code> command to resolve domain names. use it to test a domain
        like <code>google.com</code>.</p>

    <div class="form-section">
        <form method="POST" action="">
            <label for="domain">Enter a domain name:</label><br>
            <button type="submit">dig</button>
            <input type="text" id="domain" name="domain" value="google.com" required>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $domain = $_POST['domain'];
        echo "<div class='result'><h3>dig response for: " . htmlspecialchars($domain) . "</h3><pre>";
        $output = shell_exec("dig " . $domain);
        echo htmlspecialchars($output);
        echo "</pre></div>";
    }
    ?>
    <div class="challenge">
        <p>
            <b>Hint: </b>The tool may be affected by CWE-87. Retrieve the hidden flag from <code>flag.php</code> to
            confirm your finding.
        </p>
    </div>
</div>
</body>
</html>
