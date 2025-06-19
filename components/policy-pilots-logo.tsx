interface PolicyPilotsLogoProps {
  width?: number
  height?: number
  className?: string
}

export function PolicyPilotsLogo({ width = 400, height = 300, className = "" }: PolicyPilotsLogoProps) {
  return (
    <svg
      width={width}
      height={height}
      viewBox="0 0 400 300"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      className={className}
    >
      {/* Pilot Hat */}
      <g transform="translate(200, 80)">
        {/* Hat Base */}
        <ellipse cx="0" cy="0" rx="65" ry="45" fill="#2C3E50" />

        {/* Hat Brim */}
        <ellipse cx="0" cy="15" rx="75" ry="15" fill="#34495E" />

        {/* Hat Visor */}
        <path d="M -50 -10 Q 0 -25 50 -10 Q 40 0 30 5 L -30 5 Q -40 0 -50 -10 Z" fill="#3498DB" />

        {/* Hat Badge */}
        <circle cx="0" cy="-15" r="12" fill="#ECF0F1" stroke="#2C3E50" strokeWidth="2" />
        <circle cx="0" cy="-15" r="8" fill="#3498DB" />
        <circle cx="0" cy="-15" r="4" fill="#ECF0F1" />
      </g>

      {/* Pilot Face */}
      <g transform="translate(200, 130)">
        {/* Face */}
        <circle cx="0" cy="0" r="40" fill="#F8C471" stroke="#2C3E50" strokeWidth="3" />

        {/* Eyes */}
        <circle cx="-12" cy="-8" r="4" fill="#2C3E50" />
        <circle cx="12" cy="-8" r="4" fill="#2C3E50" />

        {/* Smile */}
        <path d="M -15 8 Q 0 20 15 8" stroke="#2C3E50" strokeWidth="3" fill="none" strokeLinecap="round" />

        {/* Cheeks (optional rosy cheeks) */}
        <circle cx="-20" cy="5" r="3" fill="#F1948A" opacity="0.6" />
        <circle cx="20" cy="5" r="3" fill="#F1948A" opacity="0.6" />
      </g>

      {/* Main Text: POLICY PILOTS */}
      <text
        x="200"
        y="220"
        textAnchor="middle"
        fill="#2C3E50"
        fontSize="32"
        fontWeight="bold"
        fontFamily="Arial, sans-serif"
        letterSpacing="2px"
      >
        POLICY PILOTS
      </text>

      {/* Subtitle with accent lines */}
      <g transform="translate(200, 250)">
        {/* Left accent line */}
        <line x1="-80" y1="0" x2="-20" y2="0" stroke="#3498DB" strokeWidth="3" strokeLinecap="round" />

        {/* Subtitle text */}
        <text
          x="0"
          y="5"
          textAnchor="middle"
          fill="#2C3E50"
          fontSize="14"
          fontWeight="600"
          fontFamily="Arial, sans-serif"
          letterSpacing="3px"
        >
          INSURANCE APP
        </text>

        {/* Right accent line */}
        <line x1="20" y1="0" x2="80" y2="0" stroke="#3498DB" strokeWidth="3" strokeLinecap="round" />
      </g>
    </svg>
  )
}
