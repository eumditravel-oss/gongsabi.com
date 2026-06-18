/**
 * Gongsabi Cloud Storage Adapter
 * 
 * 정적 배포 환경(GitHub Pages) 또는 실제 API 서버 연동 시
 * 파일, 이미지, 첨부파일의 경로를 클라우드 스토리지 URL로 매핑해주는 유틸리티입니다.
 */

const GongsabiStorage = (function() {
    // 향후 .env 값을 런타임에 주입받거나, API 엔드포인트에서 설정을 받아오는 방식으로 확장 가능합니다.
    const CONFIG = {
        // 임시 기본값 (실제 연동 시 API 또는 환경변수로 오버라이드)
        baseUrl: 'https://cdn.gongsabi.com/uploads',
        useCloud: false // false일 경우 로컬 경로(상대경로) 사용
    };

    /**
     * 파일 상대 경로를 클라우드 스토리지 절대 경로로 변환
     * @param {string} localPath - 예: '/images/test.png', 'board/1.zip'
     * @returns {string} - 매핑된 URL
     */
    function getUrl(localPath) {
        if (!CONFIG.useCloud) {
            // 아직 클라우드가 연결되지 않은 로컬/정적 모드일 경우 원래 경로 반환
            return localPath;
        }

        // 경로 슬래시 정리
        const cleanPath = localPath.startsWith('/') ? localPath.substring(1) : localPath;
        return \`\${CONFIG.baseUrl}/\${cleanPath}\`;
    }

    /**
     * 레거시 DB에 저장된 구형 파일 경로를 신규 클라우드 버킷 경로로 자동 매핑
     * @param {string} legacyPath 
     */
    function mapLegacyPath(legacyPath) {
        // 예: 구형 DB에 /file/board/pds/123.pdf 로 저장된 경우
        // -> 클라우드에서는 /uploads/pds/123.pdf 로 매핑할 수 있습니다.
        let mappedPath = legacyPath;
        if (legacyPath.includes('/file/board/')) {
            mappedPath = legacyPath.replace('/file/board/', 'legacy_board/');
        }
        return getUrl(mappedPath);
    }

    return {
        setConfig: function(newConfig) {
            Object.assign(CONFIG, newConfig);
        },
        getUrl: getUrl,
        mapLegacyPath: mapLegacyPath
    };
})();

// 글로벌 객체로 노출
window.GongsabiStorage = GongsabiStorage;
