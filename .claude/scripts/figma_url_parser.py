import sys
import json
from pathlib import Path
from urllib.parse import urlparse, parse_qs

def parse_figma_url(url):
    parsed = urlparse(url)
    path_parts = parsed.path.split('/')

    # Extract fileKey (/design/:fileKey/:fileName)
    fileKey = None
    for i, part in enumerate(path_parts):
        if part in ('design', 'file') and i + 1 < len(path_parts):
            fileKey = path_parts[i + 1]
            # branch case: /design/:fileKey/branch/:branchKey/
            if i + 2 < len(path_parts) and path_parts[i + 2] == 'branch':
                fileKey = path_parts[i + 3]
            break

    # Extract nodeId (node-id query parameter)
    query_params = parse_qs(parsed.query)
    nodeId = query_params.get('node-id', [None])[0]
    if nodeId:
        nodeId = nodeId.replace('-', ':')  # 2413-13474 → 2413:13474

    return {
        "original_url": url,
        "fileKey": fileKey,
        "nodeId": nodeId
    }

def main():
    urls = sys.argv[1:]
    if not urls:
        print("Usage: python figma_url_parser.py [URL1] [URL2] ...")
        return

    json_path = Path(".claude/figma-urls.json")
    json_path.parent.mkdir(parents=True, exist_ok=True)

    # Load existing data
    data = {"urls": []}
    if json_path.exists():
        data = json.loads(json_path.read_text(encoding='utf-8'))

    # Add new URLs
    for url in urls:
        parsed = parse_figma_url(url)
        data["urls"].append(parsed)
        print(f"Added: fileKey={parsed['fileKey']}, nodeId={parsed['nodeId']}")

    # Save
    json_path.write_text(json.dumps(data, indent=2, ensure_ascii=False), encoding='utf-8')
    print(f"\nSaved: {json_path}")

if __name__ == "__main__":
    main()
