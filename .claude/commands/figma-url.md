---
description: 피그마 URL에서 fileKey와 nodeId 추출하여 저장
arguments:
  - name: urls
    description: 피그마 URL들 (공백 구분)
    required: true
---

python .claude/scripts/figma_url_parser.py $ARGUMENTS
