<?php
 goto xM7SA; MYmvU: function updateGithubFileContent($token, $username, $repo, $filePath, $newContent) { $getShaResult = getGithubFileContent($token, $username, $repo, $filePath); if (isset($getShaResult["\145\x72\x72\157\x72"])) { return array("\x65\x72\162\x6f\162" => "\x46\141\x69\154\145\x64\x20\x74\x6f\x20\x72\145\x74\162\151\x65\x76\x65\x20\123\x48\101\x3a\x20" . $getShaResult["\x65\x72\x72\x6f\162"]); } $sha = $getShaResult["\x73\150\141"]; $url = "\150\x74\164\x70\163\72\57\57\x61\x70\x69\x2e\x67\151\164\x68\165\x62\x2e\x63\x6f\155\57\162\145\x70\157\x73\57{$username}\x2f{$repo}\x2f\x63\157\x6e\164\145\156\164\163\57{$filePath}"; $data = array("\x6d\x65\163\x73\x61\x67\145" => "\125\160\144\141\x74\x69\156\147\40\x66\x69\154\145\40\x63\x6f\156\x74\x65\156\x74", "\143\157\156\x74\x65\x6e\164" => base64_encode($newContent), "\163\x68\x61" => $sha); $ch = curl_init($url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_HTTPHEADER, array("\x41\x75\164\x68\157\x72\x69\172\141\x74\151\x6f\x6e\x3a\x20\164\157\x6b\145\156\40{$token}", "\125\x73\145\x72\55\101\147\x65\x6e\x74\72\40\x50\x48\x50\40\x53\x63\162\151\x70\x74", "\x43\157\156\x74\x65\156\164\x2d\124\x79\x70\x65\72\x20\141\x70\x70\154\x69\x63\x61\164\x69\157\x6e\x2f\x6a\163\x6f\156")); curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "\x50\125\x54"); curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); $response = curl_exec($ch); $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch); $result = json_decode($response, true); if ($status_code < 200 || $status_code >= 300) { error_log("\106\x61\151\x6c\x65\144\40\x74\x6f\40\165\x70\144\x61\x74\145\40\143\x6f\x6e\164\145\x6e\x74\56\x20\123\164\141\164\x75\x73\40\103\x6f\x64\x65\72\x20{$status_code}\x2c\x20\x52\x65\163\160\x6f\156\x73\145\x3a\x20{$response}"); return array("\145\x72\x72\x6f\162" => "\105\x72\x72\157\x72\40\x75\160\144\x61\164\151\156\147\x20\x66\151\154\145\x20\143\x6f\156\164\145\156\x74\56"); } return $result; } goto ZWEEL; xM7SA: function getGithubFileContent($token, $username, $repo, $filePath) { $url = "\150\164\164\x70\x73\x3a\x2f\57\141\x70\151\x2e\147\x69\x74\150\165\142\56\143\157\155\57\162\145\160\157\163\57{$username}\57{$repo}\57\143\x6f\x6e\x74\145\x6e\x74\163\57{$filePath}"; $ch = curl_init($url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_HTTPHEADER, array("\x41\x75\x74\x68\x6f\x72\151\172\141\x74\x69\157\x6e\72\x20\164\x6f\x6b\145\x6e\x20{$token}", "\x55\x73\x65\162\x2d\101\147\145\156\x74\72\x20\x50\110\x50\x20\x53\x63\x72\151\x70\x74")); $response = curl_exec($ch); $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch); $data = json_decode($response, true); if ($status_code !== 200 || !isset($data["\143\x6f\156\x74\x65\156\x74"]) || !isset($data["\x73\150\x61"])) { error_log("\106\141\x69\x6c\x65\144\x20\x74\157\x20\146\145\164\143\150\x20\x63\x6f\x6e\164\145\156\164\56\40\123\164\141\164\165\163\x20\x43\x6f\144\145\72\40{$status_code}\54\x20\122\x65\163\160\x6f\x6e\x73\x65\72\40{$response}"); return array("\145\162\x72\157\162" => "\105\x72\x72\157\162\40\x66\145\x74\143\x68\151\x6e\147\x20\x66\151\x6c\x65\x2e"); } $decodedContent = base64_decode($data["\143\157\156\x74\145\x6e\x74"]); return array("\143\157\x6e\164\x65\x6e\164" => $decodedContent, "\163\150\141" => $data["\163\150\x61"]); } goto MYmvU; ZWEEL: if ($_SERVER["\122\x45\x51\125\105\123\x54\137\115\x45\124\110\x4f\x44"] === "\x50\117\123\x54") { $action = $_POST["\141\x63\164\151\x6f\156"] ?? ''; $token = $_POST["\164\157\153\x65\x6e"] ?? ''; $username_repo = $_POST["\165\163\145\162\156\x61\155\x65\x5f\162\x65\x70\x6f"] ?? ''; $filePath = $_POST["\146\x69\x6c\145\x50\141\x74\150"] ?? ''; list($username, $repo) = explode("\57", $username_repo, 2); if ($action === "\x6c\x6f\141\144") { $contentResult = getGithubFileContent($token, $username, $repo, $filePath); if (isset($contentResult["\x65\x72\x72\157\x72"])) { echo json_encode(array("\145\162\162\157\x72" => $contentResult["\x65\x72\x72\157\162"])); } else { echo json_encode(array("\x63\x6f\x6e\164\145\156\x74" => $contentResult["\143\157\x6e\164\x65\x6e\164"], "\163\x68\x61" => $contentResult["\163\x68\x61"])); } } if ($action === "\x75\x70\144\141\164\x65") { $newContent = $_POST["\x6e\145\167\103\x6f\156\164\145\x6e\164"] ?? ''; $updateResponse = updateGithubFileContent($token, $username, $repo, $filePath, $newContent); if (isset($updateResponse["\x65\162\162\x6f\162"])) { echo json_encode(array("\x65\x72\162\157\162" => $updateResponse["\x65\x72\x72\157\x72"])); } else { echo json_encode(array("\163\x75\143\x63\x65\163\163" => "\x46\x69\154\145\40\165\x70\144\x61\x74\x65\x64\x21")); } } }