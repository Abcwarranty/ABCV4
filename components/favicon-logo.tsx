interface FaviconLogoProps {
  size?: number
}

export function FaviconLogo({ size = 32 }: FaviconLogoProps) {
  return (
    <svg width={size} height={size} viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
      {/* Simplified pilot hat for favicon */}
      <g transform="translate(16, 12)">
        {/* Hat Base */}
        <ellipse cx="0" cy="0" rx="12" ry="8" fill="#2C3E50" />

        {/* Hat Visor */}
        <path d="M -10 -2 Q 0 -6 10 -2 Q 8 2 6 3 L -6 3 Q -8 2 -10 -2 Z" fill="#3498DB" />

        {/* Hat Badge */}
        <circle cx="0" cy="-3" r="2.5" fill="#ECF0F1" />
        <circle cx="0" cy="-3" r="1.5" fill="#3498DB" />
      </g>

      {/* Simplified face */}
      <circle cx="16" cy="22" r="8" fill="#F8C471" stroke="#2C3E50" strokeWidth="1" />

      {/* Eyes */}
      <circle cx="13" cy="20" r="1" fill="#2C3E50" />
      <circle cx="19" cy="20" r="1" fill="#2C3E50" />

      {/* Smile */}
      <path d="M 12 24 Q 16 27 20 24" stroke="#2C3E50" strokeWidth="1.5" fill="none" strokeLinecap="round" />
    </svg>
  )
}
